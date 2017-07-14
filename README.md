# php-cdn-server
CDN(content distribution network) server developed using php language

live demo for [tihs click](http://php.cdn.exlinetr.com "tihs click")

### features
- Upload multiple images
- To size and present uploaded images proportionally in desired sizes

### usage
- Image upload

  Request Method: POST
  
  Request URL: http://php.cdn.exlinetr.com/FileUpload.php
  
  Request Params:
 - AppID (req)   : Uniq is the key generated for the customer yada site 
 - Content (req) : The type of the main directory address of the uploaded file
 - FileType (req) : Folder to which the uploaded file will be grouped
  
```html
<form enctype="multipart/form-data" method="post" action="FileUpload.php">
        <input type="hidden" name="AppID" value="www.haberim.com">
        <input type="hidden" name="Content" value="Haberler">
        <input type="hidden" name="FileType" value="Images">
        <input type="file" name="image[]" multiple="" accept="image/*">
        <input type="submit" value="Upload">
    </form>
```
###### Response
```json
{
"path": "files/TestUploadApplication/Test/Images/B67AF4F7-3B53-B284-BBB1-2377885BC103.png",
"aciklama": "resim upload testidir linklere tiklayarak resimleri kontrol edebilirsiniz.",
"orginal_Link": "http://phpcdn.exlinetr.com/GetFile.php?FilePath=files/TestUploadApplication/Test/Images/B67AF4F7-3B53-B284-BBB1-2377885BC103.png&w=0&h=0",
"100x100_Link": "http://phpcdn.exlinetr.com/GetFile.php?FilePath=files/TestUploadApplication/Test/Images/B67AF4F7-3B53-B284-BBB1-2377885BC103.png&w=100&h=100"
},
{
"path": "files/TestUploadApplication/Test/Images/93DD7B7C-EACD-A721-5499-DDD8A094A260.jpg",
"aciklama": "resim upload testidir linklere tiklayarak resimleri kontrol edebilirsiniz.",
"orginal_Link": "http://phpcdn.exlinetr.com/GetFile.php?FilePath=files/TestUploadApplication/Test/Images/93DD7B7C-EACD-A721-5499-DDD8A094A260.jpg&w=0&h=0",
"100x100_Link": "http://phpcdn.exlinetr.com/GetFile.php?FilePath=files/TestUploadApplication/Test/Images/93DD7B7C-EACD-A721-5499-DDD8A094A260.jpg&w=100&h=100"
}
```


- Calling Images

  Request Method: GET
  
  Request URL: http://php.cdn.exlinetr.com/GetFile.php
  
  Request Params:
 - filepath (req)   : Address of the file (response param name : path)
 - w (opt) : Image width size, 0 is given for the original size
 - h (opt) : Image height size , 0 is given for the original size

###### original size
[http://phpcdn.exlinetr.com/GetFile.php?FilePath=files/TestUploadApplication/Test/Images/A07FC9E5-E250-ABAA-BB4F-E37629C50203.jpg&w=0&h=0](http://phpcdn.exlinetr.com/GetFile.php?FilePath=files/TestUploadApplication/Test/Images/A07FC9E5-E250-ABAA-BB4F-E37629C50203.jpg&w=0&h=0 "http://phpcdn.exlinetr.com/GetFile.php?FilePath=files/TestUploadApplication/Test/Images/A07FC9E5-E250-ABAA-BB4F-E37629C50203.jpg&w=0&h=0")
###### reduced size (100x100)
[http://phpcdn.exlinetr.com/GetFile.php?FilePath=files/TestUploadApplication/Test/Images/A07FC9E5-E250-ABAA-BB4F-E37629C50203.jpg&w=100&h=100](http://phpcdn.exlinetr.com/GetFile.php?FilePath=files/TestUploadApplication/Test/Images/A07FC9E5-E250-ABAA-BB4F-E37629C50203.jpg&w=100&h=100 "http://phpcdn.exlinetr.com/GetFile.php?FilePath=files/TestUploadApplication/Test/Images/A07FC9E5-E250-ABAA-BB4F-E37629C50203.jpg&w=100&h=100")

```html
<img src="http://phpcdn.exlinetr.com/GetFile.php?FilePath=files/TestUploadApplication/Test/Images/A07FC9E5-E250-ABAA-BB4F-E37629C50203.jpg&w=0&h=0">
```




