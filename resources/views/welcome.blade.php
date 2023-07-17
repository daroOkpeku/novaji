<!DOCTYPE html>
<html >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body >

        <div class="w-full  flex flex-col">

            <section class="w-full  mt-20 text-center">
                encrypt/decrypt
            </section>
            <section class=" w-11/12 m-auto ">
                <input type="text" class="word w-full border border-blue-500" placeholder="Enter 'Welcome to Lagos'" />
            </section>
             <div class=" w-11/12 flex flex-row items-center "> <span class="otherstring" style="display:none;">encrypted String:</span> <span class="encrypted"> </span> </div>
             <article class="w-full grid place-items-center  py-2 mt-10">
                <button class="border bg-blue-400 text-white py-2 rounded-md decrypted" >Click Here To decrypted</button>
             </article>
        </div>

    </body>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script>
    let orginal = window.location.origin
    let word = document.querySelector('.word');
     let encrypted = document.querySelector(".encrypted")
     let decrypted = document.querySelector(".decrypted")
     let otherstring = document.querySelector(".otherstring")
    word.addEventListener("change", function(e){
        e.preventDefault();
        let jack = e.target.value.length
            axios.get(
                `${orginal}/encrypt/${e.target.value}`
              ).then(res=>{
                  console.log(res)
                  if(res.data.success){
                    encrypted.innerText = `${res.data.success}`;
                    otherstring.style.display = 'block'
                  }
              }).catch(error=>{
                  console.log(error)
              })


    })

    decrypted.addEventListener("click", function(e){
        e.preventDefault();
        console.log(encrypted.innerText)
        const formdata = new FormData();
        let headers = new Headers();
        headers.append('Content-Type', 'application/json')
        formdata.append("word", encrypted.innerText);
        let url = `${orginal}/decryptdata`;
        axios.post(url, formdata, headers).then(res=>{
           // console.log(res.data.success)
            encrypted.innerText = ` ${res.data.success}`;
            otherstring.style.display = 'block'
            otherstring.innerText = 'decrypted String:'
        }).catch(err=>{
            console.log(err)
        })
    })





 </script>
</html>
