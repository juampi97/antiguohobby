let productionMailRoute = "https://mail-antiguohobby.onrender.com/mail";
let devMailRoute = "http://localhost:8080/mail";
let enviroment = "dev"; // prod || dev
let mailRoute = "";

switch (enviroment) {
  case "dev":
    mailRoute = devMailRoute;
    break;
  case "prod":
    mailRoute = productionMailRoute;
    break;
}

window.addEventListener('load',() => {
    const buttonSend = document.querySelector("#buttonSend")
    const contactForm = document.querySelector("#contactForm")
    buttonSend.addEventListener("click", (event) =>{
      e.preventDefault();
      grecaptcha.ready(function() {
        grecaptcha.execute('6LdhOzApAAAAAMUpwQYhi95TGeEqFgXH80_jAeNh', {action: 'submit'}).then(function(token) {
            // Add your logic to submit to your backend server here.
            postData()
        });
      });
    });
})

const getData = () => {
    const datos = new FormData(contactForm)
    const datosProcesados = Object.fromEntries(datos.entries())
    contactForm.reset()
    return datosProcesados
}

const postData = async () => {
  console.log("holii");
  const newMessage = getData();
  console.log(newMessage);
  try {
    const response = await fetch(mailRoute, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(newMessage),
    });
    if (response.ok) {
    //    const jsonResponse = await json.response() 
      alert("Gracias por contactarnos.");
    }
  } catch (error) {
    console.log(error);
  }
};

