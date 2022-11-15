window.addEventListener('load', function(){
    const controlbox = document.querySelector(".controls");
    const searchButton = document.querySelector(".lookup");
    const searchbar = document.getElementById('country');
    var country = searchbar.value;
    const xmlRequest = new XMLHttpRequest();
    
    searchButton.addEventListener('click', lookupCountry);
    

    function lookupCountry (element){   
        element.preventDefault();     
        xmlRequest.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200)
            {                
                document.getElementById("result").innerHTML = this.responseText;                
            }
            else {
                document.getElementById("result").innerHTML = "Issue with request, please try again";
            }
        };
        var url = "world.php?country="+country + "&context=countries";
        xmlRequest.open('GET', url, true);
        xmlRequest.send();
    }


    
    
    

    

    searchbar.addEventListener('input', function(e){
        e.preventDefault();
        const searchVal = e.target.value;
    })

})