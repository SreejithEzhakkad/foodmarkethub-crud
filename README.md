
# Test - Property CRUD

 
This app contain CRUD API for property. This app buid with the framework [Lumen](https://lumen.laravel.com/docs).
  

## Installation

  Clone the repository.

`$ git clone git@github.com:SreejithEzhakkad/test-property-crud.git`

`$ cd test-property-crud`

Copy `.env.example` to `.env` 

`$ cp .env.example .env`

Change values in the `.env`  file. 
Do the following 

`$ composer install`

`$ php artisan migrate`

`$ php artisan db:seed`

`$ php -S localhost:8000 -t public`
  

## API Documentaion

  
### Get All Properties
Get All Properties

**URL** : `/properties`

**Method** : `GET`



**Response example**

```json
{
	"data": [
	{
		"id": 1,
		"house_name_number": "Apt No 312",
		"postcode": "37262",
		"created_at": "2021-11-21T16:06:07.000000Z",
		"updated_at": "2021-11-21T16:06:07.000000Z",
		"owners": [
		{
			"id": "a1cc6ffc-b4c4-39f5-b69b-f581d816575d",
			"first_name": "Hallie",
			"last_name": "Feil",
			"created_at": "2021-11-21T16:06:07.000000Z",
			"updated_at": "2021-11-21T16:06:07.000000Z",
			"pivot": {
				"property_id": 1,
				"user_id": "a1cc6ffc-b4c4-39f5-b69b-f581d816575d",
				"main_owner": 1
			},
			"phones": [
				{
					"id": 5,
					"user_id": "a1cc6ffc-b4c4-39f5-b69b-f581d816575d",
					"number": "239-574-2131",
					"type": "home",
					"created_at": null,
					"updated_at": null
				}
			]
		}
	]
 }
],
"message": "Success",
"success": true
}```



```
  
### Create Property
Create Property

**URL** : `/properties`

**Method** : `POST`

**Request Example**

```json
{
	"house_name_number":  "Apt No 301",
	"postcode":  "678631",
	"owners":  [
		{
			"user_id":  "9bbe4b0d-5451-387e-a436-4edddd2d47fb",
			"main_owner":  true
		},
		{
			"user_id":  "13185b6d-ceb7-3e44-a799-6fe85048f64e",
			"main_owner":  false
		},
	]
}```



```

**Response example**

```json
{
    "data": {
        "house_name_number": "Apt No 301",
        "postcode": "678631",
        "updated_at": "2021-11-21T11:56:11.000000Z",
        "created_at": "2021-11-21T11:56:11.000000Z",
        "id": 5
    },
    "message": "Property has been created successfully!",
    "success": true
}```



```