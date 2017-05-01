@extends('layouts.master')

@section('content')
<h1>Add GPU</h1>
<div class="" id="vue-add-singer">
    <div class="form-group">
        <label for="name">GPU Name</label>
        <input type="text" class="form-control" v-model="name" id="name" placeholder="Name GPU">
        <input type="text" class="form-control" v-model="power" id="power" placeholder="Number Power Miner">
    </div>

    <button class="btn btn-primary" v-on:click="submit()">Submit</button>
</div>
@endsection

@section('script')
<script>
var vm = new Vue({
    el: '#vue-add-singer',
    data: {
        'name': '',
        'power': ''
    },
    methods: {
        submit: function () {
            axios.post('http://wongklom.dev/api/gpus', {
                name: this.name,
                power: this.power
            }).then(function (response) {
                console.log(response.data.data);
                alert(response.data.data);
                vm.name = '';
                vm.power = '';
            }).catch(function (error) {
                alert('Error (see console log)');
                console.log(error);
            });
        }
    }
});
</script>
@endsection
