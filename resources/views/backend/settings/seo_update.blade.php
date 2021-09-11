@extends('admin.master')
@section('content')
<br>
<div class="container">
    <div class="col-md-12">
        <div class="white-box">
            <h3 class="box-title m-b-2">SEO Settings</h3>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <form method="post" action="" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $seo->id }}">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Meta Title</label>
                            <input type="text" class="form-control" name="meta_title" id="meta_title" value="{{ $seo->meta_title }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Meta Author</label>
                            <input type="text" class="form-control" name="meta_author" id="meta_author" value="{{ $seo->meta_author }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Meta Keyword </label>
                            <textarea name="meta_keyword" id="textarea" class="form-control" required placeholder="Textarea text">
                            {{ $seo->meta_keyword }}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Meta Description </label>
                            <textarea name="meta_description" id="textarea" class="form-control" required placeholder="Textarea text">
                            {{ $seo->meta_description }}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Google Analytics </label>
                            <textarea name="google_analytics" id="textarea" class="form-control" required placeholder="Textarea text">
                            {{ $seo->google_analytics }}
                            </textarea>
                        </div>
                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-success mb-5" value="Change SEO Settings">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function mainImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#mainImg').attr('src', e.target.result).width(80).height(80);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection