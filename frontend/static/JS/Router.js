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

    routeDms : function()
    {
        let request = App.request("dksllksqd/v1.0/tool");

        request.then(function(data){
            let opts = {
                dms : data,
            }
            App.changePage("app-dms", opts);
        });

        request.catch(function(error){
            ErrorHandler.alertIfError(error);
        });
    },

     ///////////////////////////////////////////////////////////////

    setRoutes : function()
    {
        route("", Router.routeIndex);
        route("dms", Router.routeDMs);
        
    }
}