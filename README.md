[![](https://scdn.rapidapi.com/RapidAPI_banner.png)](https://rapidapi.com/package/ThreadGenius/functions?utm_source=RapidAPIGitHub_ThreadGeniusFunctions&utm_medium=button&utm_content=RapidAPI_GitHub)

# ThreadGenius Package
Thread Genius is the best visual search and image recognition API for style-focused applications.Traditional search engines are great for documents and articles, but when it comes to visual items like products or style inspiration, they aren’t intuitive enough.Thread Genius helps you build a smarter and more pleasurable experience for discovering content on your app or website.
* Domain: [threadgenius.co](https:\/\/threadgenius.co)
* Credentials: apiKey

## How to get credentials: 
0. Register on the [threadgenius.co](https:\/\/threadgenius.co)
1. After register, you will see API key in your [dashboard](https:\/\/threadgenius.co\/dashboard)


## Custom datatypes: 
 |Datatype|Description|Example
 |--------|-----------|----------
 |Datepicker|String which includes date and time|```2016-05-28 00:00:00```
 |Map|String which includes latitude and longitude coma separated|```50.37, 26.56```
 |List|Simple array|```["123", "sample"]``` 
 |Select|String with predefined values|```sample```
 |Array|Array of objects|```[{"Second name":"123","Age":"12","Photo":"sdf","Draft":"sdfsdf"},{"name":"adi","Second name":"bla","Age":"4","Photo":"asfserwe","Draft":"sdfsdf"}] ``` 
 
## ThreadGenius.addImage
Image Input from URL.

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| Your API key.
| imageUrl| File       | The URL of the image.
| cropX1  | String     | The percentage crop of the image in order.If you want add crop, required all four crop field.
| cropX2  | String     | The percentage crop of the image in order.If you want add crop, required all four crop field.
| cropY1  | String     | The percentage crop of the image in order.If you want add crop, required all four crop field.
| cropY2  | String     | The percentage crop of the image in order.If you want add crop, required all four crop field.

## ThreadGenius.createCatalog
Use this endpoint to create a new empty catalog.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Your API key.
| catalogName| String     | Catalog name.

## ThreadGenius.getAllCatalogs
Use this endpoint to list all catalogs.

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| Your API key.

## ThreadGenius.getCatalog
Use this endpoint to get a specific catalog.

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| Your API key.
| catalogId| String     | Catalog id.(gid)

## ThreadGenius.deleteCatalog
Use this endpoint to delete a specific catalog.

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| Your API key.
| catalogId| String     | Catalog id.(gid)

## ThreadGenius.addObjectToCatalog
Use this endpoint to add a list of objects to a specific catalog. Objects are added and indexed asynchronously.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Your API key.
| catalogId  | String     | Catalog id.(gid)
| imageObject| Array      | Image object.Up to 32 images in a single request.
| metadata   | JSON       | Additional JSON-formatted metadata associated with the object.Catalog objects have an optional metadata parameter. You can use this parameter to attach key-value data to objects. Metadata is useful for storing additional, structured information about an object. As an example, you could store an object’s unique identifier in your system. Metadata is not used by Thread Genius (e.g., to affect how the indexing is done).

## ThreadGenius.getObjectFromCatalog
Use this endpoint to get information about a specific object from a catalog.

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| Your API key.
| catalogId| String     | Catalog id.(gid)
| objectId | String     | Object id.(gid)

## ThreadGenius.deleteObjectFromCatalog
Use this endpoint to delete a specific object from a catalog.

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| Your API key.
| catalogId| String     | Catalog id.(gid)
| objectId | String     | Object id.(gid)

## ThreadGenius.getAllObjectsFromCatalog
Use this endpoint to page through all objects within a catalog.

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| Your API key.
| catalogId| String     | Catalog id.(gid)
| nextKey  | String     | Key to get the next page of results.

## ThreadGenius.predictTagsForImage
Predict tags for a single image.Thread Genius can predict either tags or bounding boxes around items. Tags are concepts our machine learning model thinks are present within the image input(s).

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| Your API key.
| imageUrl| File       | The URL of the image.

## ThreadGenius.predictTagsForImages
Use the following endpoint to predict tags for multiple images. Batch predictions are placed on a queue. In the response, you’ll get prediction gids, which are identifiers for checking up on the status of a prediction. Predictions have a TTL of 3 days.

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| Your API key.
| imageUrls| List       | The URLs of the images.Up to 32 images in a single request.

## ThreadGenius.getTagPrediction
Tag predictions made with more than one image input are placed in a queue to be processed for later. You can check up on the status of these predictions using the following endpoint.

| Field          | Type       | Description
|----------------|------------|----------
| apiKey         | credentials| Your API key.
| tagPredictionId| String     | Tag prediction id.(gid)

## ThreadGenius.getAllTagPredictions
You can page through all tag predictions from the last 3 days by using the following endpoint.

| Field  | Type       | Description
|--------|------------|----------
| apiKey | credentials| Your API key.
| nextKey| String     | Key to get the next page of results.

## ThreadGenius.detectItemsOnImage
Use the following endpoint to predict bounding boxes around items of interest within a single image.

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| Your API key.
| imageUrl| File       | The URL of the image.

## ThreadGenius.detectItemsOnImages
Use the following endpoint to predict bounding boxes around items of interest within multiple images. In the response, you’ll get prediction gids, which are identifiers for checking up on the status of a prediction. Predictions have a TTL of 3 days.

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| Your API key.
| imageUrls| List       | The URLs of the images.Up to 5 images in a single request.

## ThreadGenius.getDetectPrediction
Detect predictions made with more than one image input are placed in a queue to be processed for later. You can check up on the status of these predictions using the following endpoint.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Your API key.
| predictionId| String     | Prediction id (gid).

## ThreadGenius.getAllDetectPredictions
You can page through all detect predictions from the last 3 days by using the following endpoint.

| Field  | Type       | Description
|--------|------------|----------
| apiKey | credentials| Your API key.
| nextKey| String     | Key to get the next page of results.

## ThreadGenius.getProductByPredictedKeywords
Use this endpoint to search a catalog by keywords predicted by our machine learning model.

| Field         | Type       | Description
|---------------|------------|----------
| apiKey        | credentials| Your API key.
| numberOfResult| Number     | Specifying the number of results (default is 50). Results come back sorted by relevancy.
| catalogId     | String     | Catalog id.(gid)
| keywords      | List       | List of keywords for search.Maximum - 5.

## ThreadGenius.getProductByImage
Use this endpoint to perform a visual search over a catalog.

| Field         | Type       | Description
|---------------|------------|----------
| apiKey        | credentials| Your API key.
| numberOfResult| Number     | Specifying the number of results (default is 50). Results come back sorted by relevancy.
| catalogId     | String     | Catalog id.(gid)
| imageUrl      | File       | The URL of the image.


