@if(session()->has('message'))
    <div id="toast-container" class="toast-container toast-top-right deleteAlert" style="width: 400px">
        <div class="toast toast-success" aria-live="polite" style="display: block;"><button type="button" class="toast-close-button" role="button">×</button>
            <div class="toast-title">Success!</div>
            <div class="toast-message font-medium-1" role="alert">{{ session('message') }}</div>
        </div>
    </div>
@endif
@if(session()->has('errorMessage'))
    <div id="toast-container" class="toast-container toast-top-right deleteAlert" style="width: 400px">
        <div class="toast toast-error" aria-live="assertive" style="display: block;"><button type="button" class="toast-close-button" role="button">×</button>
            <div class="toast-title">Error!</div>
            <div class="toast-message font-medium-1">{{ session('errorMessage') }}</div>
        </div>
    </div>
@endif
