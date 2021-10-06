# edifiable-christain-center
Project for christain excerpts in text and picture formats

### BE branch for the api

##### Api for the admin form 
http://edifiable.herokuapp.com/api/post  (please test only on postman or other api client. Testing as a url on browser throws error or you will see an error 500)

##### Api to fetch feeds or posts 

http://edifiable.herokuapp.com/api/feed  (please test on postman or as a url on the web)

Likely return for this api; an example: 

```
{
    "data": [
        {
            "id": 1,
            "user_id": 1,
            "title": "How to make God happy",
            "text": "Yo, we move regrdless of the circmustances   Yo, we move regrdless of the circmustances   Yo, we move regrdless of the circmustances   ",
            "created_at": "2021-07-06T16:15:58.000000Z",
            "user": {
                "id": 1,
                "username": "@jovialcore"
            }
        }
    ]
}
```

### FE branch is the frontend
