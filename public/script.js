function myFunction () {
    var option = document.getElementById("options").value;
    if (option === "dvd"){
        document.getElementById("sizediv").style.display = "block";
        document.getElementById("heightdiv").style.display = "none";
        document.getElementById("weightdiv").style.display = "none";
 
    } else if (option === "furniture"){
        
        document.getElementById("sizediv").style.display = "none";
        document.getElementById("heightdiv").style.display = "block";
        document.getElementById("weightdiv").style.display = "none";

    } else if (option === "book") {
        
        document.getElementById("sizediv").style.display = "none";
        document.getElementById("heightdiv").style.display = "none";
        document.getElementById("weightdiv").style.display = "block";

    }
    else {
        console.log("You mush choose.");
    }
}

console.log("somesomesome");