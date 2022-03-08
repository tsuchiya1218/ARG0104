function check() {
  let pass = document.getElementById("password").value;
  pass = (pass == null) ? "" : pass;


  let res = /^[A-Za-z0-9]{6,}$/.test(pass);
    if (!res) {
      alert("パスワードは半角英数字で入力してください。（6文字以上）");
    }
  location.href
}
