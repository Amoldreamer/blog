const search = document.getElementById('search');
const matchList = document.getElementById('match-list');

//Search states.json and filter it
const searchStates = async searchText =>{
    const res= await fetch('json/names.json');
    const patients = await res.json();

    //Get matches to current text input
    let matches = patients.filter(patient =>{
        const regex = new RegExp(`^${searchText}`,'gi');
        return patient.name.match(regex);
    });

    if(searchText.length === 0){
        matches = [];
        matchList.innerHTML = '';
    }

    outputHtml(matches);
};

//Show results in HTML
const outputHtml = matches =>{
    if(matches.length > 0){
        const html = matches.map(match =>
            
                <h4>${match.name}</h4>
            )
            .join('');
            matchList.innerHTML = html;
    }
}
search.addEventListener('input', ()=>searchStates(search.value));