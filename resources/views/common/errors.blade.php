<!-- resources/views/common/errors.blade.php -->

@if (count($errors) > 0)
    <!-- Form Error List -->
    <div class="alert alert-danger alert-dismissable mw600 center-block" style="text-align:center;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true" color="blue">x</button>
        <!-- <strong>Something went wrong!</strong> -->

        <ul style="list-style:none;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif