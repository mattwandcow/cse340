INSERT INTO clients (clientID, clientFirstname, clientLastname, clientEmail, clientPassword, comment) VALUES (NULL, 'Tony', 'Stark', 'tony@starkent.com', 'Iam1ronM@n', '\"I am the real Ironman\"');
UPDATE clients SET clientLevel = '3' WHERE clients.clientID = 1; 
UPDATE inventory SET invDescription = REPLACE(invDescription, "small interior", "spacious interior") WHERE invModel = 'Hummer';
SELECT * FROM inventory i INNER JOIN carclassification c on c.classificationId = i.classificationId where c.classificationName = "SUV";
DELETE FROM inventory WHERE invId = 1;
UPDATE inventory set invImage=CONCAT('/phpmotors',invImage), invThumbnail=CONCAT('/phpmotors',invThumbnail);