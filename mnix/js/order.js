window.addEventListener("DOMContentLoaded", () => {
    if(document.querySelector("#orderForm")){
        let entreeAddButton = document.querySelector("#addEntree");
        let entreeSelects = document.querySelector("#entreeSelects");
        let entreeSelect = document.querySelector("#Entree1");
        const entreeSelectOptions = entreeSelect.children;
        entreeAddButton.addEventListener("click", addEntree);

        let selectEntreeNumber = 2;

        function addEntree(){
            let select = document.createElement("select"); 
            select.name =  "Entree" + selectEntreeNumber;
            select.id =  "Entree" + selectEntreeNumber;
            entreeSelects.appendChild(select);
            for(let i = 0; i < entreeSelectOptions.length; i++){
            select.appendChild(entreeSelectOptions[i].cloneNode(true));
            }
            let selectQuantity = document.createElement("select"); 
            selectQuantity.name =  "quantityEntree" + selectEntreeNumber;
            selectQuantity.id =  "quantityEntree" + selectEntreeNumber;
            entreeSelects.appendChild(selectQuantity);
            for(let i = 1; i < 11; i++){
                let optionQuantity = document.createElement("option"); 
                optionQuantity.value = i;
                optionQuantity.textContent = i;
                selectQuantity.appendChild(optionQuantity);
            }
            let boutonSuprimer = document.createElement("input");
            boutonSuprimer.type = "button";
            boutonSuprimer.value = "suprimer";
            boutonSuprimer.classList.add("Entree"+selectEntreeNumber);
            boutonSuprimer.addEventListener("click", suprimerProduit);
            entreeSelects.appendChild(boutonSuprimer);
            selectEntreeNumber++;
        }

        let platPrincipalAddButton = document.querySelector("#addPlatPrincipal");
        let platPrincipalSelects = document.querySelector("#PlatPrincipalSelects");
        let platPrincipalSelect = document.querySelector("#PlatPrincipal1");
        const platPrincipalSelectOptions = platPrincipalSelect.children;
        platPrincipalAddButton.addEventListener("click", addplatPrincipal);

        let selectplatPrincipalNumber = 2;

        function addplatPrincipal(){
            let select = document.createElement("select"); 
            select.name =  "PlatPrincipal" + selectplatPrincipalNumber;
            select.id =  "PlatPrincipal" + selectplatPrincipalNumber;
            platPrincipalSelects.appendChild(select);
            for(let i = 0; i < platPrincipalSelectOptions.length; i++){
            select.appendChild(platPrincipalSelectOptions[i].cloneNode(true));
            }
            let selectQuantity = document.createElement("select"); 
            selectQuantity.name =  "quantityPlatPrincipal" + selectplatPrincipalNumber;
            selectQuantity.id =  "quantityPlatPrincipal" + selectplatPrincipalNumber;
            platPrincipalSelects.appendChild(selectQuantity);
            for(let i = 1; i < 11; i++){
                let optionQuantity = document.createElement("option"); 
                optionQuantity.value = i;
                optionQuantity.textContent = i;
                selectQuantity.appendChild(optionQuantity);
            }
            let boutonSuprimer = document.createElement("input");
            boutonSuprimer.type = "button";
            boutonSuprimer.value = "suprimer";
            boutonSuprimer.classList.add("PlatPrincipal"+selectplatPrincipalNumber);
            boutonSuprimer.addEventListener("click", suprimerProduit);
            platPrincipalSelects.appendChild(boutonSuprimer);
            selectplatPrincipalNumber++;

        }

        let BoissonAddButton = document.querySelector("#addBoisson");
        let BoissonSelects = document.querySelector("#BoissonSelects");
        let BoissonSelect = document.querySelector("#Boisson1");
        const BoissonSelectOptions = BoissonSelect.children;
        BoissonAddButton.addEventListener("click", addBoisson);

        let selectBoissonNumber = 2;

        function addBoisson(){
            let select = document.createElement("select"); 
            select.name =  "Boisson" + selectBoissonNumber;
            select.id =  "Boisson" + selectBoissonNumber;
            BoissonSelects.appendChild(select);
            for(let i = 0; i < BoissonSelectOptions.length; i++){
            select.appendChild(BoissonSelectOptions[i].cloneNode(true));
            }
            let selectQuantity = document.createElement("select"); 
            selectQuantity.name =  "quantityBoisson" + selectBoissonNumber;
            selectQuantity.id =  "quantityBoisson" + selectBoissonNumber;
            BoissonSelects.appendChild(selectQuantity);
            for(let i = 1; i < 11; i++){
                let optionQuantity = document.createElement("option"); 
                optionQuantity.value = i;
                optionQuantity.textContent = i;
                selectQuantity.appendChild(optionQuantity);
            }
            let boutonSuprimer = document.createElement("input");
            boutonSuprimer.type = "button";
            boutonSuprimer.value = "suprimer";
            boutonSuprimer.classList.add("Boisson"+selectBoissonNumber);
            boutonSuprimer.addEventListener("click", suprimerProduit);
            BoissonSelects.appendChild(boutonSuprimer);
            selectBoissonNumber++;

        }

        let DessertAddButton = document.querySelector("#addDessert");
        let DessertSelects = document.querySelector("#DessertSelects");
        let DessertSelect = document.querySelector("#Dessert1");
        const DessertSelectOptions = DessertSelect.children;
        DessertAddButton.addEventListener("click", addDessert);

        let selectDessertNumber = 2;

        function addDessert(){
            let select = document.createElement("select"); 
            select.name =  "Dessert" + selectDessertNumber;
            select.id =  "Dessert" + selectDessertNumber;
            DessertSelects.appendChild(select);
            for(let i = 0; i < DessertSelectOptions.length; i++){
            select.appendChild(DessertSelectOptions[i].cloneNode(true));
            }
            let selectQuantity = document.createElement("select"); 
            selectQuantity.name =  "quantityDessert" + selectDessertNumber;
            selectQuantity.id = "quantityDessert" + selectDessertNumber;
            DessertSelects.appendChild(selectQuantity);
            for(let i = 1; i < 11; i++){
                let optionQuantity = document.createElement("option"); 
                optionQuantity.value = i;
                optionQuantity.textContent = i;
                selectQuantity.appendChild(optionQuantity);
            }            
            let boutonSuprimer = document.createElement("input");
            boutonSuprimer.type = "button";
            boutonSuprimer.value = "supprimer";
            boutonSuprimer.id = "DessertSuprimer" + selectDessertNumber;
            let label = document.createElement("label");
            label.for = "DessertSuprimer" + selectDessertNumber ;
            //label.textContent = "suprimer";
            boutonSuprimer.classList.add("Dessert"+selectDessertNumber);
            boutonSuprimer.addEventListener("click", suprimerProduit);
            DessertSelects.appendChild(label);
            label.appendChild(boutonSuprimer);
            selectDessertNumber++;

        }

        /*
        <div id="entreeSelects">       
                <select name="Entree1">
                ';
                foreach ($EntreeArray as $Entree) {
                    echo '<option value="'.$Entree['id_product'].'">
                    <p>'.$Entree['product_name'].'</p>
                    <p>'.$Entree['prix'].'</p>
                    </option>';
                }
                //session id pour la commande faire un lien a la fin 
                echo '</select>';
                echo '<select name="quantityEntree1">';
                for($e = 1; $e < 11; $e++){
                    echo '<option value="'.$e.'">'.$e.'</option>';
                }        
                echo '</select> </div>';
        */

        let delivery = document.querySelector("#delivery");
        let takeout = document.querySelector("#takeout");
        let adresseDiv = document.querySelector("#adresse");
        delivery.addEventListener("change", typeCommande);
        takeout.addEventListener("change", typeCommande);
        function typeCommande(){
            if(this.value == "livraison"){        
            let h2 = document.createElement("h2"); 

            h2.textContent = "Adresse de livraison";
            let input = document.createElement("input");
            input.type =  "text";
            input.name = "client_adresse";
            adresseDiv.appendChild(h2);
            adresseDiv.appendChild(input);
            }else{
                if(this.value == "à emporter"){
                let adresseChild = adresseDiv.children;
                for(let e = adresseChild.length - 1; e >= 0; e--){
                    adresseChild[e].remove();
                }}
            }   
            
        let boutonSuppresionArray = document.querySelectorAll(".boutonSuppresion");

        for(let i = 0; i < boutonSuppresionArray.length;  i++){
        boutonSuppresionArray[i].addEventListener("click", suprimerProduit);
        }
        
        
        }

        

/*
        <h2>*(optionel) adresse de livraison</h2>
        <input type="text" name="client_adresse" id="client_adresse"> 
*/

function suprimerProduit(){
            let ValeurSelectASuprimer = this.classList;
            let ASuprimer = document.querySelector("#"+ValeurSelectASuprimer);
            let ASuprimerQuantity = document.querySelector("#quantity"+ValeurSelectASuprimer);
            let ASuprimerChildrenArray = ASuprimer.children;            
            let ASuprimerQuantityChildrenArray = ASuprimerQuantity.children;
            for(let e = ASuprimerChildrenArray.length - 1; e >= 0; e--){
                    ASuprimerChildrenArray[e].remove();
                }
                for(let e = ASuprimerQuantityChildrenArray.length - 1; e >= 0; e--){
                    ASuprimerQuantityChildrenArray[e].remove();
                }
            ASuprimer.remove();
            ASuprimerQuantity.remove();
            this.remove();

        }        
    }
});