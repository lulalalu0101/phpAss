/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */

function getCities(country) {
   let citiesDropdown = document.querySelector("#cities");


   if(country.trim() === "") {
       citiesDropdown.disabled = true;
       citiesDropdown.selectedIndex = 0;
       return false;
   }

   fetch("malaysia.json")
   .then(function(response){
       return response.json();
   })
   .then(function(data){
       let cities = data[country];
       let out = "";
       out += `<option value disabled selected>Select city</option>`;
      
       for(let city of cities) {
           out += `<option value="${city}">${city}</option>`;
       }


       citiesDropdown.innerHTML = out;
       citiesDropdown.disabled = false;
   });
}



