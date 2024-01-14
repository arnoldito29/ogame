console.log('veikia')
chrome.action.onClicked.addListener(async (tab) => {
  let frames = await chrome.webNavigation.getAllFrames({tabId: tab.id});
  let frame1 = frames[0].frameId;
  let frame2 = frames[1].frameId;

  chrome.scripting.executeScript({
    target: {
      tabId: tab.id,
      frameIds: [frame1, frame2],
    },
    files: ['content.js'],
  });
});
