const WebSocket = require('ws');
const http = require('http');
const querystring = require('querystring'); 

const wss = new WebSocket.Server({ port: 8080 });
const clients = new Set(); // Define a Set to keep track of connected clients.

wss.on('connection', (ws) => {
    clients.add(ws);

    ws.on('message', (message) => {
        try {
            const parsedMessage = JSON.parse(message);

            const postData = querystring.stringify(parsedMessage);

            const options = {
                hostname: 'localhost', // Change to your server's hostname or IP address.
                port:80, // Change to your server's port.
                path: 'insertMessage.php', // Adjust the path as needed.
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json', // Set the content type to JSON.
                    'Content-Length': Buffer.byteLength(postData),
                },
            };

            const req = http.request(options, (res) => {
                // Handle the response from the PHP script.
                let data = '';
                res.on('data', (chunk) => {
                    data += chunk;
                });

                res.on('end', () => {
                    console.log(data); // Log the response from the PHP script.
                });
            });

            req.on('error', (error) => {
                console.error('Error making HTTP request:', error);
            });

            // Write the data to the request body.
            req.write(postData);
            req.end();

            // Broadcast the message to all clients.
            wss.clients.forEach((client) => {
                if (client !== ws && client.readyState === WebSocket.OPEN) {
                    client.send(message);
                }
            });
        } catch (error) {
            console.error('Error parsing message:', error);
        }
    });

    ws.on('close', () => {
        clients.delete(ws);
    });
});

