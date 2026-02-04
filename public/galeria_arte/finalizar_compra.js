// const vue = require("./vue");

//Vue CON MAYUSCULA 
//vue MAL
//Vue BIEN

var finalizar_compra= new Vue({
 
  el:'#finalizar_compra',
 
  data: function() {
    return{
        // total:10
        orden:[],

    }
  } 

  ,created(){
    //Esta pendiente de cualquier evento 'producto_nuevo'
    bus.$on('producto_nuevo',(producto)=>{
      this.orden.push(producto);
      console.log(producto)
    });
  }

  ,methods:{


    finalizar_pago:function(){
        
    var xhr = new XMLHttpRequest();
    xhr.open('GET','/finalizar_pago',true);
    //funcion flecha para que el this apunte directamente a vue
    xhr.onreadystatechange= ()=>{
      if(xhr.readyState==4){
        if(xhr.status==200){
          // this.productos=JSON.parse(xhr.responseText);  
            
        }
        else{
          alert("Falla");
        }
      }
    };
    xhr.send();
    }
  }

  ,computed:{
    total:function(){
      return 1;
    }
  }

  
})