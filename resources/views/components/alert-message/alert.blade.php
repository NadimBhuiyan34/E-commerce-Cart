<div id="alert-wrapper">
    @if (session('success'))
        <div class="alert alert-success" id="alert-message">
            {{ session('success') }}
            <div class="progress-bar" id="progress"></div>
        </div>
    @endif
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // JavaScript to remove the alert message after 5 seconds
    document.addEventListener('DOMContentLoaded', function() {
        const alertMessage = document.getElementById('alert-message');
        const progress = document.getElementById('progress');
        
        // Remove the alert message after 5 seconds
        setTimeout(function() {
            alertMessage.style.display = 'none';
        }, 5000);
    });
</script>
