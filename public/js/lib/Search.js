class Search {
    inputObject; 
    formSearchObject; 
    currentLocation = window.location.href;
    constructor
    (
        formSearchObject = document.getElementById("search-form"),
        inputObject = document.getElementById("search-input")
    ){
        this.formSearchObject = formSearchObject;
        this.inputObject = inputObject;

        // memberi tahu bahwa jika ada enter pada input maka lakukan method submit dan hentikan aksi default yang dimana aksi default nya adalah
        // menambahkan tanda tanya pada URL
        if(this.inputObject != null)
        {
            this.inputObject.addEventListener("keydown", (e) => {
                if(e.code == "Enter"){
                    this.submit();
                    e.preventDefault();
                }
            })
        }
    }

    submit(){
        let searchRequest = this.inputObject.value;
        const arrayUrl = this.currentLocation.split('/');
        const issetSearchRequest = arrayUrl[7] != undefined;

        if(issetSearchRequest){
           const [http, x, host, public_folder, quizcuy, controller, method] = arrayUrl;
           this.currentLocation = [http,x,host,public_folder, quizcuy, controller, method].join('/');
        }

        window.location.href = `${this.currentLocation}/${searchRequest}`;
        
    }
}


searchInput = new Search();