# Names dataset with api
Getting a list of Iranian names by gender.

## Source
* [`index.php`](https://github.com/ehsan-shahbakhsh/api-iranian-names/blob/main/index.php)

## Dataset
* [`iranianNames.json`](https://github.com/ehsan-shahbakhsh/api-iranian-names/blob/main/iranianNamesDataset.json)

## How to use
```
domain/index.php?gender=female
```

## Allowed values for the gender parameter
* male
* female
* مرد
* زن
* مذکر
* مونث


## Sample answer
```json
{
  "ok": true,
  "status": 200,
  "result": [
    {
      "name": "آذر",
      "gender": "F"
    }
  ]
}
```


## License
The api-iranian-names library has an MIT license. You can read this file [LICENSE](LICENSE) for more information.
