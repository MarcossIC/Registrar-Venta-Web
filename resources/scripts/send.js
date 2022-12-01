export default function send(method, url, content, callback){
    //Definir la request.
    const xhr = new XMLHttpRequest();
    if (!xhr) {
      callback(0, "Las solicitudes XMLHTTP no son soportadas en tu navegador");
      return;
    }
  
    //Configurar la request.
    xhr.onreadystatechange =  handleResponse;
    xhr.timeout =             15000;
    xhr.ontimeout = () =>     { callback(0, "Se ha agotado el tiempo de espera del servidor"); return };
  
    //Abrir la request.
    xhr.open(method, url, true);
    if (content  !== undefined) xhr.setRequestHeader("Content-Type", "application/json");
    
    xhr.send(content.body);
  
    //Manejar la respuesta.
  function handleResponse() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 0)   {callback(0, "No se ha podido establecer la comunicación con el servidor"); return; }
      if (xhr.status === 404) {callback(404, "No se ha encontrado el recurso solicitado"); return; }
      if (xhr.status === 500) {callback(500, "Error del servidor"); return; }
      callback(xhr.status, xhr.responseText);
    }
  }
}