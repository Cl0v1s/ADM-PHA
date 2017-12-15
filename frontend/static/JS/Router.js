/**
 * Created by clovis on 11/08/17.
 */

let Router = 
{
    redirect : function (rt)
    {
        route(rt);
    },

    start : function()
    {
        Router.setRoutes();
        route.start(true);        
    },

    /////////////////////////////////////////////////////////////////
    // Définition des fonctions de route
    routeIndex : function()
    {
        App.changePage("app-index", null);
    },

    routeDMs : function(filters = "")
    {
        if(filters != "")
            filters = " and "+filters;
        let request = App.request("http://www.clovis-portron.cf/ADMPHA/backend/v1.0/tool?$filter=type eq 0"+filters, null, "GET");

        request.then(function(data){
            let opts = {
                dms : data.value,
            }
            App.changePage("app-dms", opts);
        });

        request.catch(function(error){
            ErrorHandler.alertIfError(error);
        });
    },

    routeDM : function(id)
    {
        let request = App.request("http://www.clovis-portron.cf/ADMPHA/backend/v1.0/tool/"+id, null, "GET");
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
        if(filters != "")
            filters = " and "+filters;
        let request = App.request("http://www.clovis-portron.cf/ADMPHA/backend/v1.0/tool?$filter=type eq 1"+filters, null, "GET");
        request.then(function(data)
        {
            let opts = { ats : data.value};        
            App.changePage("app-ats", opts);
            
        }); 
        request.catch(function(error)
        {
            ErrorHandler.alertIfError(error);
        });
    },

    routeResidents : function(filters = "")
    {
        if(filters != "")
            filters = "?$filter="+filters;
        let request = App.request("http://www.clovis-portron.cf/ADMPHA/backend/v1.0/resident"+filters, null, "GET");
        request.then(function(data)
        {
            let opts = { residents : data.value};        
            App.changePage("app-residents", opts);
            
        }); 
        request.catch(function(error)
        {
            ErrorHandler.alertIfError(error);
        });
    },

    routeResident : function(id)
    {
        let requestUsecase = App.request(App.Address + "/usecase", null, "GET");
        let requestResident = App.request("http://www.clovis-portron.cf/ADMPHA/backend/v1.0/resident/"+id, null, "GET");
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
        route("", Router.routeIndex);
    },
}