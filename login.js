const passwordInputElement = document.getElementById("senha");
const showPasswordCheckboxElement = document.getElementById("mostrar-senha");

showPasswordCheckboxElement.addEventListener("change", (e) => {
  if (e.currentTarget.checked) {
    passwordInputElement.type = "text";
  } else {
    passwordInputElement.type = "password";
  }
});
