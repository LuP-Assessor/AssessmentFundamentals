/**
* The SoapClient Class
*/
function BlasterSoapClient() {
        this.transportURI = '';
        this.urn = 'urn:noxmethods';    
        this.enablePrivilege = 'UniversalBrowserRead';
}  

/*
*    Method BlasterSoapClient::asyncInvoke() does not halt script when receiving result!
*/
BlasterSoapClient.prototype.asyncInvoke = function (method,args,callback){
    try {
        netscape.security.PrivilegeManager.enablePrivilege(this.enablePrivilege);
    } catch (e) {
        alert(e);
        return false;
    }
    
    var soapCall = new SOAPCall();
    var prot = BlasterSoapClient.prototype;
    
    soapCall.transportURI = this.transportURI;
    
    var params = new Array(args.length);
    for(i=0;i<args.length;i++){
        params[i] = new SOAPParameter(args[i],'')
    }
    
    soapCall.encode(0, method, this.urn, 0, null, params.length, params);
    
    soapCall.asyncInvoke(
      function (response, soapcall, error)
       {
          var r = prot.handleSOAPResponse(response,soapcall,error);
          callback(r);
        }
    );
};

/*
*    Response handler for BlasterSoapClient::asyncInvoke()
*/
BlasterSoapClient.prototype.handleSOAPResponse = function (response,call,error)
{
    if (error != 0)
    {
        throw "Service failure";
    } else
    {
        var fault = response.fault;
        if (fault != null) {
            var code = fault.faultCode;
            var msg = fault.faultString;
            throw "SOAP Fault:\n\n" +
                "Code: "  + code +
                "\n\nMessage: " + msg
        } else
        {
            return response;
        }
    }
    
    throw "Failure";
};

/*
* When using this, all scripts will halt until result could be retrieved
*/
BlasterSoapClient.prototype.invoke = function (func, args)
{
      try {
          netscape.security.PrivilegeManager.enablePrivilege(this.enablePrivilege);
       } catch (e) {
           throw e;
    }
    
       var soap_call = new SOAPCall();
       soap_call.transportURI = this.transportURI;
       
       var p = new Array(args.length);
       for(i=0;i<args.length;i++){
           p[i] = new SOAPParameter(args[i],'');
       }
        
       soap_call.encode(0, func, this.urn, 0, null, p.length, p);
       
       var temp = soap_call.invoke();
       
       if (temp.fault) {
           throw 'Code: ' + temp.fault.faultCode + '\n String: ' + temp.fault.faultString;
       } else {
           var response = new Array();
           response = temp.getParameters(false, {});
           return response[0].value;
       }
}

/*
* User defineable method to handle result when asyncInvoke() is called. add it as third param there!
*/
BlasterSoapClient.prototype.showResults = function (results)
{
    if (!results)
    {
      return;
    }
    
    var params = results.getParameters(false,{});
      alert(params[0].value);
}; 