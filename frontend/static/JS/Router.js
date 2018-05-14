/**
 * Created by clovis on 11/08/17.
 */

let Router = 
{

    /**
     * Change l'url actuel
     */
    redirect : function (rt)
    {
        route(rt);
    },

    /**
     * Démarre le routeur 
     */
    start : function()
    {
        Router.setRoutes();
        route.start(true);        
    },

    /////////////////////////////////////////////////////////////////
    // Définition des fonctions de route


    routeIndex : function()
    {
        App.hidePopIn();
        App.changePage("app-index", null);
    },

    routeDMs : function(filters = "")
    {
        App.hidePopIn();
        if(filters != "")
            filters = " and "+filters;
        let requestResults = App.request(App.Address + "/tool?$filter=type eq 0"+filters, null, "GET");
        let requestDms = App.request(App.Address + "/tool?$filter=type eq 0", null, "GET");
        let request = Promise.all([requestResults, requestDms]);

        request.then(function(data){
            let opts = {
                results : data[0].value,
                dms : data[1].value
            }
            App.changePage("app-dms", opts);
        });

        request.catch(function(error){
            ErrorHandler.alertIfError(error);
        });
    },

    routeDM : function(id)
    {
        App.hidePopIn();
        let request = App.request(App.Address + "/tool/"+id, null, "GET");
        request.then(function(data){
            let opts = {
                dm : data.value,
            };
            opts.dm.comments = null;
            App.changePage("app-dmdetails", opts);
        });
        request.catch(function(error){
            ErrorHandler.alertIfError(error);
        });
    },
   
    routeATs : function(filters = "")
    {
        App.hidePopIn();
        if(filters != "")
            filters = " and "+filters;
        let requestResults = App.request(App.Address + "/tool?$filter=type eq 1"+filters, null, "GET");
        let requestAts = App.request(App.Address + "/tool?$filter=type eq 1", null, "GET");
        let request = Promise.all([requestResults, requestAts]);

        request.then(function(data){
            let opts = {
                results : data[0].value,
                ats : data[1].value
            };
            App.changePage("app-ats", opts);
        });

        request.catch(function(error){
            ErrorHandler.alertIfError(error);
        });
    },

    routeResidents : function(filters = "")
    {
        App.hidePopIn();
        if(filters != "")
            filters = "?$filter="+filters;
        let requestResidents = App.request(App.Address + "/resident", null, "GET");
        let requestResults = App.request(App.Address + "/resident"+filters, null, "GET");
        let request = Promise.all([requestResidents, requestResults]);
        request.then(function(data)
        {
            let opts = { 
                residents : data[0].value,
                results : data[1].value,
            };        
            App.changePage("app-residents", opts);
            
        }); 
        request.catch(function(error)
        {
            ErrorHandler.alertIfError(error);
        });
    },

    routeResident : function(id)
    {
        App.hidePopIn();
        let requestUsecase = App.request(App.Address + "/usecase", null, "GET");
        let requestResident = App.request(App.Address + "/resident/"+id, null, "GET");
        let request = Promise.all([requestResident, requestUsecase]);
        request.then(function(data)
        {
            let opts = { resident : data[0].value, usecases : data[1].value };        
            App.changePage("app-resident", opts);
        }); 
        request.catch(function(error)
        {
            ErrorHandler.alertIfError(error);
        });
    },

     ///////////////////////////////////////////////////////////////

     /**
      * Définition des routes, associant une url locale à une fonction de route décrite ci-dessus
      */
    setRoutes : function()
    {
        route("dms", Router.routeDMs);
        route("dms/*", Router.routeDMs);
        route("dm/*", Router.routeDM);
        route("resident/*", Router.routeResident);
        route("residents", Router.routeResidents);        
        route("residents/*", Router.routeResidents);
        route("ats", Router.routeATs);
        route("ats/*", Router.routeATs);
        route("at/*", Router.routeDM);
        route("", Router.routeResidents);
    },
}