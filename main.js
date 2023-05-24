const { createApp } = Vue

  createApp({
    data() {
      return {
        apiAllList: 'http://localhost/struttura-CRUD/apis/listaIntera.php',
        apiSingleList: 'http://localhost/struttura-CRUD/apis/singoloElem.php',
        apiCreateList: 'http://localhost/struttura-CRUD/apis/createElem.php',
        apiUpdateList: 'http://localhost/struttura-CRUD/apis/updateElem.php',
        apiDeleteList: 'http://localhost/struttura-CRUD/apis/deleteElem.php',
        data: '',
        singoloDato: '',
        nuovoDato: ''
      }
    },
    methods: {
        chiamataApi(){
            axios.get( this.apiAllList )
                 .then( (res) => {
                    this.data = res.data;
                 } );
        },
        mostraSingoloElem(i){

          const dati = {
            listIndex: i
          }

          axios.post( this.apiSingleList, dati, {headers: {'Content-Type': 'multipart/form-data'}}  )
                .then( (res)=>{
                  this.singoloDato = res.data;
                } )

        },
        aggiungiDato(){
            // this.data.push( 
            //     {
            //         "text": this.nuovoDato
            //     }
            //  )

          const dati = {
            nuovoElemento: this.nuovoDato
          }

          axios.post( this.apiCreateList, dati, {headers: {'Content-Type': 'multipart/form-data'}} )
              .then( (res)=>{
                this.nuovoDato = '';

                //Aggiorno l'array interno di elementi lista spesa
                this.data = res.data;

              } )

        },
        aggiornoElem( i ){

          const dati = {
            listIndex: i
          }

          axios.post( this.apiUpdateList, dati, {headers: {'Content-Type': 'multipart/form-data'}} )
              .then( (res)=>{

                this.data = res.data;

              } )

        },
        deleteElem(i){

          const dati = {
            listIndex: i
          }

          if( confirm('vuoi cancellare il dato ? ')) {
            
            axios.post( this.apiDeleteList, dati, {headers: {'Content-Type': 'multipart/form-data'}} )
              .then( (res)=>{

                this.data = res.data;

              } )
          }

          
        }
    },
    mounted(){
        this.chiamataApi();
    }
}).mount('#app')