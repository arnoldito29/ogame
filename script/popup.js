document.getElementById('totalStatsButton').addEventListener('click', function() {
    chrome.tabs.query({ active: true, currentWindow: true }, function(tabs) {
        chrome.tabs.sendMessage(tabs[0].id, { action: 'totalStats' }, function(response) {
            document.getElementById('content').innerText = response.type;
            $.post("http://localhost:8000/api/v1/ogame/stats_points",
                {
                    url: response.url,
                    data: response.content,
                    type: response.type
                });
        });
    });
});
document.getElementById('militaryStatsButton').addEventListener('click', function() {
    chrome.tabs.query({ active: true, currentWindow: true }, function(tabs) {
        chrome.tabs.sendMessage(tabs[0].id, { action: 'militaryStats' }, function(response) {
            document.getElementById('content').innerText = response.type;
            $.post("http://localhost:8000/api/v1/ogame/stats_military",
                {
                    url: response.url,
                    data: response.content,
                    type: response.type
                });
        });
    });
});
document.getElementById('galaxyButton').addEventListener('click', function() {
    chrome.tabs.query({ active: true, currentWindow: true }, function(tabs) {
        chrome.tabs.sendMessage(tabs[0].id, { action: 'galaxy' }, function(response) {
            document.getElementById('content').innerText = response.type;
            $.post("http://localhost:8000/api/v1/ogame/galaxy",
                {
                    url: response.url,
                    data: response.content,
                    type: response.type,
                    galaxy: response.galaxy,
                    system: response.system
                });
        });
    });
});
