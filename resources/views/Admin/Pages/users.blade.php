@extends('Admin._layouts.master')
@section('content')

<div class="app" id="app">
    <h3>All Users:</h3>

</div>   
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

<script type="module">
    let v=new Vue({
        el:'#app',
        data:{
            user_name:''
        },
        headers: {
            'Access-Control-Allow-Origin': '*',
            'Content-Type': 'application/json',
        },
        mounted(){
            axios.get('http://18.188.90.213/m_api/get-draw-history.php')
            .then(response=>{this.user_name=response.data.user_name;
            console.log(this.response.data);
            })
            .catch(error=>{console.log(error)})
        }
    });
</script>
@endsection