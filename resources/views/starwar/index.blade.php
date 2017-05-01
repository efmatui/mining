@extends('layouts.master')

@section('content')
<h1 class="title">Singers</h1>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default" id="json-beautifier">
            <div class="panel-heading">
                JSON Response
            </div>
            <div class="panel-body">
                <pre>@{{name}}</pre>
                <pre>@{{height}}</pre>
                <pre>@{{mass}}</pre>
                <pre>@{{hair_color}}</pre>
                <pre>@{{skin_color}}</pre>
                <pre>@{{eye_color}}</pre>
                <pre>@{{birth_year}}</pre>
                <pre>@{{gender}}</pre>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    var data = <?php echo $resBody; ?>;
    var vjson = new Vue({
        el: '#json-beautifier',
        data: data,
        computed: {
            json: function(){
                return JSON.stringify(this.data, null, 2);
            }
        }
    });

    var vm = new Vue({
        el: '#vue-app-singers',
        data: data
    });
</script>
@endsection
