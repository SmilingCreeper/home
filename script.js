document.getElementById('bugForm').addEventListener('submit', function(e) {  
    e.preventDefault(); // 阻止表单的默认提交行为  
    var bugNumber = 1; // 初始化为1，从1开始轮下去  
    var bugDescription = document.getElementById('bugDescription').value;  
    var triggerSteps = document.getElementById('triggerSteps').value;  
    if (bugDescription && triggerSteps) { // 只需检查bug描述和触发步骤是否填写  
        // 发送Ajax请求到服务器  
        var xhr = new XMLHttpRequest();  
        xhr.open('POST', 'save_bug.php', true); // 请确保你的服务器上有一个save_bug.php脚本来处理这个请求  
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');  
        xhr.onreadystatechange = function() {  
            if (xhr.readyState === 4 && xhr.status === 200) {  
                var response = xhr.responseText; // 服务器返回的响应，例如 "Bug #123 has been saved."  
                document.getElementById('bugList').innerHTML = response; // 显示响应消息和Bug列表  
            }  
        };  
        xhr.send('bugNumber=' + bugNumber + '&bugDescription=' + encodeURIComponent(bugDescription) + '&triggerSteps=' + encodeURIComponent(triggerSteps)); // 发送数据到服务器  
          
        // 更新bug编号  
        bugNumber++; // 自增1，为下一个bug编号做准备   
    } else {  
        alert('请填写所有字段！'); // 如果用户没有填写所有字段，显示警告信息  
    }  
});
