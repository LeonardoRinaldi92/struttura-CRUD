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
        //chaiamta API al file LISTAINTERA.PHP (che trasformera il json in array associativo per poi ritrasformarlo in json)
        chiamataApi(){
            axios.get( this.apiAllList )
                 .then( (res) => {
                    this.data = res.data;
                 } );
        },

        //ottengo informazioni dell'elemento sfruttando il suo index e chiamandolo in funzionzione come parametro
        mostraSingoloElem(i){

          const dati = {
            // costante dati all'index reperito e creo oggetto listIndex = indoce
            listIndex: i
          }
          //chiamata axios (a: singoloElem.php',aggiungo l'informzione "listIndex = indice", {headers: {'Content-Type': 'multipart/form-data'}} <== obbligato!)
          axios.post( this.apiSingleList, dati, {headers: {'Content-Type': 'multipart/form-data'}}  )
                .then( (res)=>{
                  
                  this.singoloDato = res.data;
                } )

        },

        //funzione per aggiungere un elemento all'array degli elementi "base" 
        aggiungiDato(){
            // this.data.push( 
            //     {
            //         "text": this.nuovoDato
            //     }
            //  )
          



          //associo il v-model dell'input all'oggetto ch
          const dati = {
            nuovoElemento: this.nuovoDato
          }

          //chiamata axios (a: singoloElem.php',aggiungo l'informzione "nuovoElemento = quello scritto in input", {headers: {'Content-Type': 'multipart/form-data'}} <== obbligato!)
          axios.post( this.apiCreateList, dati, {headers: {'Content-Type': 'multipart/form-data'}} )
              .then( (res)=>{

                //faccio un reset del v-model
                this.nuovoDato = '';

                //Aggiorno l'array interno di elementi lista spesa
                this.data = res.data;

              } )

        },


         //aggiorno le informazioni dell'elemento sfruttando il suo index e chiamandolo in funzionzione come parametro
        aggiornoElem( i ){

          // costante dati all'index reperito e creo oggetto listIndex = indoce
          const dati = {
            listIndex: i
          }

          //chiamata axios (a: upfdateElem.php',,aggiungo l'informzione "listIndex = indice", {headers: {'Content-Type': 'multipart/form-data'}} <== obbligato!)
          axios.post( this.apiUpdateList, dati, {headers: {'Content-Type': 'multipart/form-data'}} )
              .then( (res)=>{

                this.data = res.data;

              } )

        },

        //elimino un elemento sfruttando il suo index e chiamandolo in funzionzione come parametro
        deleteElem(i){

          // costante dati all'index reperito e creo oggetto listIndex = indoce
          const dati = {
            listIndex: i
          }

          //usando la funzione "confirm(fai la domanda) che fara apparire un alert con conferma o annulla" se positiva allora:
          if( confirm('vuoi cancellare il dato ? ')) {


            //chiamata axios (a: upfdateElem.php',aggiungo l'informzione "nuovoElemento = quello scritto in input", {headers: {'Content-Type': 'multipart/form-data'}} <== obbligato!)
            axios.post( this.apiDeleteList, dati, {headers: {'Content-Type': 'multipart/form-data'}} )
              .then( (res)=>{

                this.data = res.data;

              } )
          }

          
        }
    },
    mounted(){
      //faccio la prima in partenza dell'api
        this.chiamataApi();
    }

    //il MOUNT DI VUE
}).mount('#app')