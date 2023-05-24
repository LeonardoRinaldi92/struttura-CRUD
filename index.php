<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vue + php</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css' integrity='sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==' crossorigin='anonymous'/>
</head>
<body>

<div id="app">
    <h1>Lista spesa</h1>

    <div>
        <ul>
            <li v-for="(elem,index) in data" :key="index" @click="mostraSingoloElem(index)">
                <span @click="aggiornoElem( index )" :class=" (elem.done) ? 'text-decoration-line-through' : '' ">
                    {{ elem.text }}
                </span>
                <span class="text-danger ms-3" @click="deleteElem(index)">
                    X
                </span>
            </li>
        </ul>
    </div>

    <input type="text" v-model="nuovoDato" @keyUp.enter="aggiungiDato">

</div>
    
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js' integrity='sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g==' crossorigin='anonymous'></script>
<script src="main.js"></script>
</body>
</html>