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

    routeDMs : function()
    {
        let request = App.request("http://192.168.1.19/ADMPHA/backend/v1.0/tool", null, "GET");

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
   
    routeATs : function()
    {
        let request = App.request("gzefuzefb/v1.0/tool");
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

     ///////////////////////////////////////////////////////////////

    setRoutes : function()
    {
        route("dms", Router.routeDMs);
        route("ats", Router.routeATs);
        route("", Router.routeIndex);
    },
}