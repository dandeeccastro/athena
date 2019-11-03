export async function getBooks() {
	const URI = 'http://192.168.1.105:8000'
	try {
    let response = await fetch(
      URI + "/api/book/"
    );
		let responseJson = await response.json();
		for (let item of responseJson){
			item.visible = false
		}
		console.warn(responseJson)
    return responseJson;
  } catch (error) {
    console.error(error);
  }
}