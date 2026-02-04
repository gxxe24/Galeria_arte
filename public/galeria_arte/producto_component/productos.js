var producto= new Vue({
    el:'#producto',
    data:function(){
        return{
            productos:[],//Hay veo como paso los datos al formato correspondiente
            tipos:'',
            precio:0,

        }
    },

    methods:{
      //Funcion que envia el producto hacia 
        añadir_producto(producto){
          bus.$emit('producto_nuevo',producto)
          
        }
    }
    ,created(){
    


    var xhr = new XMLHttpRequest();
    xhr.open('GET','/productos',true);
    //funcion flecha para que el this apunte directamente a vue
    xhr.onreadystatechange= ()=>{
      if(xhr.readyState==4){
        if(xhr.status==200){
          this.productos=JSON.parse(xhr.responseText);  
            
        }
        else{
          alert("Falla");
        }
      }
    };
    xhr.send();

  }
    

})