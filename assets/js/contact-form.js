jQuery(document).ready(function($) {
    var $form = $('#lg-contact-form');
    var $status = $('#lg-form-status');
    var $submitBtn = $('#lg_submit_btn');

    $form.on('submit', function(e) {
        e.preventDefault();

        // Reset status alert
        $status.removeClass('success error info').hide().text('');

        // Get values
        var name = $.trim($('#lg_name').val());
        var email = $.trim($('#lg_email').val());
        var subject = $.trim($('#lg_subject').val());
        var message = $.trim($('#lg_message').val());

        // Simple validation
        if (name === '' || email === '' || message === '') {
            showStatus('Please fill in all required fields.', 'error');
            return;
        }

        // Email validation regex
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            showStatus('Please enter a valid email address.', 'error');
            return;
        }

        // Disable button and show loading state
        $submitBtn.prop('disabled', true);
        var originalBtnHtml = $submitBtn.html();
        $submitBtn.html('<i class="fas fa-spinner fa-spin"></i> Sending...');

        showStatus('Sending your message, please wait...', 'info');

        // Submit form via AJAX
        $.ajax({
            url: lg_ajax_obj.ajax_url,
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'lg_submit_contact',
                nonce: lg_ajax_obj.nonce,
                name: name,
                email: email,
                subject: subject,
                message: message
            },
            success: function(response) {
                if (response.success) {
                    showStatus(response.data.message, 'success');
                    $form[0].reset();
                } else {
                    showStatus(response.data.message || 'An error occurred.', 'error');
                }
            },
            error: function() {
                showStatus('An unexpected error occurred. Please try again later.', 'error');
            },
            complete: function() {
                // Re-enable button and restore text
                $submitBtn.prop('disabled', false).html(originalBtnHtml);
            }
        });
    });

    function showStatus(msg, type) {
        $status.text(msg).removeClass('success error info');
        if (type === 'success') {
            $status.addClass('success');
        } else if (type === 'error') {
            $status.addClass('error');
        } else if (type === 'info') {
            $status.addClass('info');
        }
        $status.fadeIn(300);
    }
});
