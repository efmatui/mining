@extends('layouts.master')

@section('content')
<div class="row" id="vue-app-singers">
        <div class="panel panel-default" >
            <div class="form-group">
                <label for="sel1">Select GPU for Calculate:</label>
                <select class="form-control" id="chooseGpu">
                    <option v-for="d in data" >@{{d.name}}</option>
                </select>
            </div>

        <input type="text" class="form-control" v-model="calculate" id="calculate" placeholder="0">
        <button class="btn btn-success" v-on:click="calculation()" >Calculate</button>
    </div>
    <div v-if="count>0">
        <div class="panel" >
            <p>@{{choosed}}</p>
            <div class="table-responsive">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Profitability table<span class="hidden-sm hidden-xs"> *</span></th>
                        <th>Income</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Current</th>
                        <td><span id="in-current">@{{ethvalue}}</span> ETH/Day<span class="hidden-sm hidden-xs"> </td>
                    </tr>
                    <tr>
                        <th>ETH TO THB *<span class="hidden-sm hidden-xs">*</span></th>
                        <th colspan="3"><span id="roi-days">@{{thbvalue}}</span> Bath</th>
                    </tr>
                </tbody>
            </table>
        </div>
        </div>
    </div>
</div>


@endsection

@section('script')
<script>
    var data = <?php echo $resBody; ?>;

    var vm = new Vue({
        el: '#vue-app-singers',
        data: data,
        methods : {
            calculation : function(){
                var yourSelect = document.getElementById( "chooseGpu" );
                this.choosed="Results for  "+yourSelect.options[ yourSelect.selectedIndex ].value;
                this.count+=1;
                for (var i = 0; i < this.data.length; i++) {
                    if ("Results for  "+this.data[i].name==this.choosed){
                        this.power=this.data[i].power*this.calculate;
                        break;
                    }
                }
                this.ethvalue=this.power*this.ethdefault/this.powerdefault;
                this.thbvalue=this.ethvalue*this.thbdefault/this.ethdefault/50;
            }
        }
    });
</script>
@endsection