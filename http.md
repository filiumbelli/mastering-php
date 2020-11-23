# How an HTTP request works

- Headers
    1. GET /  HTTP/1.1 -> Request method / Protocol
    2. Host: hostname.com -> Domain name of the server (might use multiple VHS(virtual hosting servers))
    3. User-Agent: curl/7.43.0 -> What browser the client is using (Might be malicious)
    4. Accept: */* -> Content-Type header (text/plain, application/json, image/png,text/html;charset=UTF-8)

- Responses
    1. HTTP/1.1 301 Moved Permanently -> Status code and response
    2. Server: nginx/1.10.3 (Ubuntu) -> Request supplier
    3. Date: Mon, 23 Nov 2020 19:42:29 GMT  -> Date when the message sent
    4. Content-Type: text/html -> Content type
    5. Content-Length: 194
    6. Connection: keep-alive -> Control options for connection
    7. Location: hostname.com -> Where to go

# In REST APIs GET POST PUT and DELETE methods are frequntly used but there are two others, HEAD and OPTIONS

- HTTP OPTIONS
    1. Request details which requests methods you can use on a given endpoint.
    2. Provides information about available communication options
    3. Allow option sends the data according to restrictions.
    4. Request 200 status

- HTTP HEAD
    1. Returns the header of a HTTP request without body.
    2. Request 200 status

- Managing the status code is vital for correct development of a API.



# HTTP Messages
- 1xx messages: Informational
- 2xx messages: Success
- 3xx messages: Redirect
- 4xx messages: Client Error
- 5xx messages: Server Error


- Difference of POST and PUT request
    1. PUT is idempotent while POST is not.
    2. POST updates a resource, causes a change. PUT is used when you know to URL you want to create.
    3. If a user will generate an account with a unique ID POST is used. If it is a particular endpoint PUT is used. POST / user ------- PUT /user/specific
    4. Overwrite is also done with PUT method.
    