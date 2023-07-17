<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
    <style>
            input , .bootstrap-select.btn-group button{
                background-color: #f3f4f6  !important;
                height: 44px  !important;
                box-shadow: none  !important;
            }

            input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
          -webkit-appearance: none;
          margin: 0;
        }

        /* Firefox */
        input[type=number] {
          -moz-appearance: textfield;
        }

    </style>
</head>
<body>
    <div id="wrapper" class="flex flex-col justify-between h-screen">
        <div class="lg:p-12 max-w-xl lg:my-0 my-12 mx-auto p-6 space-y-">
                    <form class="lg:p-10 p-6 space-y-3 relative bg-white shadow-xl rounded-md">
                        <h1 class="lg:text-2xl text-xl font-semibold mb-6"> Personal Information </h1>
                        <span id="message" class="lg:text-sm text-base font-normal mb-6 text-center flex flex-row items-center justify-center message" >  </span>
                        <div>
                            <label class="mb-0" for=""> Name </label>
                            <input type="text" id="" placeholder="Name" class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full Name">
                        </div>
                        <div>
                            <label class="mb-0" for="">Phone number</label>
                            <input type="number" id="08165648269" placeholder="" class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full phone">
                        </div>

                        <div>
                            <label class="mb-0" for="">Email </label>
                            <input type="email" id="" placeholder="Info@example.com" class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full email">
                        </div>

                        <div>
                            <button type="button" id="btn" class="bg-blue-600 font-semibold p-2.5 mt-5 rounded-md text-center text-white w-full btn">
                                Submit</button>
                        </div>




                    </form>
                </div>


        </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
  let btn = document.querySelector('.btn');
  let name = document.querySelector('.Name');
  let phone = document.querySelector('.phone');
  let email = document.querySelector('.email');
  let message = document.querySelector(".message")
  let orginal = window.location.origin
  btn.addEventListener('click', function(e) {
  e.preventDefault();
  const formdata = new FormData();
  let headers = new Headers();
  headers.append('Content-Type', 'application/json')
  formdata.append("name", name.value);
  formdata.append("phone", phone.value);
  formdata.append("email", email.value);
  let url = `${orginal}/registerdata`;
  axios.post(url, formdata, headers).then(res=>{
 console.log(res.data.success)
 message.innerText = `${res.data.success}`;
 }).catch(err=>{
    let error = err.response.data.errors
    if(error.name){
     message.innerText = `${error.name[0]}`;
    }
    else if(error.phone){
        message.innerText = `${error.phone[0]}`;
    }else if(error.email){
        message.innerText = `${error.email[0]}`;
    }
 })


  });
</script>

</html>
