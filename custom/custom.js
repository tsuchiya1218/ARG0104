function checkSideDish() {
    let count = 0;
    document.querySelectorAll('.side').forEach((e)=>{
        if (e.checked) count++;
    })
    if (count == 2){
        return true;
    }else{
        alert("副菜は二つ選んでください");
        return false;
    }
}