let App =
{
    // L'adresse de base dans laquelle on a besoin de taper éventuellement
    //Address : "http://www.clovis-portron.cf/ADMPHA/backend/v1.0",
    Address : "http://localhost:8080/v1-0",

    // Le composant actuellement monté en tant que page 
    Page : null,

    // Le composant actuellement monté en tant que PopIn
    PopIn: null,


    /**
     * Convertit un objet JSON en donnée de formulaire compatible url-from-encoded
     * json: objet json à convertir 
     */
    jsonToQuery : function(json) {
        return  Object.keys(json).map(function(key) {
                if(json[key] != null)
                    return encodeURIComponent(key) + '=' +
                        encodeURIComponent(json[key]);
            }).join('&');
    },

    /**
     * Effectue une requete Ajax et retourne une promesse.
     * address : concaténé après App.Address, addresse à interroger
     * data : données de la requête
     */
    request : function(address, data, method = "POST", redirect = true)
    {
        return new Promise(function(resolve, reject)
        {
            App.showLoading();
            var href=window.location.href;
            if(data == null)
                data = {};

            options = {
                method: method,
                mode: 'cors',
            };

            if(method != "GET" && method != "HEAD")
            {
                options.headers =  { 'Content-Type': 'application/json' };
                options.body = JSON.stringify(data);
            }

            var request = fetch(address, options);
            request.then(function(response){
                App.hideLoading();
                response = response.json();
                if(address.indexOf(App.Address) == -1)
                {
                    resolve(response);
                    return;
                }
                try
                {
                    ErrorHandler.handle(response);
                    resolve(response);
                }
                catch(error)
                {
                    if(error.name == ErrorHandler.State.FATAL)
                    {
                        if(redirect)
                        {
                            var message = encodeURI(error.message);
                            reject(ErrorHandler.State.FATAL);
                            route("/error/"+message);
                        }
                        else 
                        {
                            ErrorHandler.alertIfError(error);
                        }
                    }
                    else 
                        reject(error);
                }
            });
            request.catch(function(error){
                App.hideLoading();
                var message = encodeURI("Une erreur réseau a eu lieu. Vérifiez votre connexion et réessayez.");
                reject(ErrorHandler.State.FATAL);
                route("/error/"+message);
            });
        });
    },

    /**
     * Change la page actuellement montée
     * tag : nouveau tag à monter
     * data : données à transmettre en opts au nouveau tag monté
     */
    changePage : function (tag, data)
    {
        if(App.Page != null)
        {
            App.Page.forEach(function(t)
            {
                t.unmount();
            });
            var e = document.createElement("div");
            e.id = "app";
            document.body.appendChild(e);
        }
        App.Page = riot.mount("div#app", tag, data);
        window.scroll(0,0);
    },

    /**
     * Affiche une popin contenant un tag donné
     * tag: Tag à afficher au sein de la popin
     * data: objet à transmettre en opts au tag à afficher 
     */
    showPopIn : function(tag, data)
    {
        if(App.PopIn != null)
        {
            App.PopIn.forEach(function(t)
            {
                t.unmount();
            });
            App.PopIn = null;
            
        }
        document.getElementById("app").classList.add("blur");
        var e = document.createElement("div");
        e.id = "popin";
        document.body.appendChild(e);
        App.PopIn = riot.mount("div#popin", tag, data);
        e.classList.add("visible");
        var close = document.createElement("input");
        close.type = "button";
        close.value = "X";
        close.id = "close";
        close.onclick = function(){
            App.hidePopIn();
        };
        e.appendChild(close);
    },

    /**
     * Cache la popin
     */
    hidePopIn : function()
    {
        document.getElementById("app").classList.remove("blur");
        var e = document.getElementById("popin");
        if(e != null)
            e.remove();
    },

    LoadingCounter : 0,

    /**
     * Affiche l'animation de chargement 
     */
    showLoading : function()
    {
        App.LoadingCounter++;
        if(document.getElementById("loading") != null)
            return;
        var e = document.createElement("div");
        e.id = "loading";
        document.body.appendChild(e);
    },

    /**
     * Masque l'animation de chargement
     */
    hideLoading()
    {
        App.LoadingCounter--;
        if(App.LoadingCounter > 0)
            return;
        var e = document.getElementById("loading");
        if(e == null)
            return;
        e.remove();
        App.LoadingCounter = 0;
    },

    /**
     * Affiche une notification à l'utilisateur
     */
    showNotification : function(message)
    {
        //TODO: revoir ca pour le présenter d'une meilleure manière
        alert(message);
    }

  
}