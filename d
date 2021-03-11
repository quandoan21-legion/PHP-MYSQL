[0;1;32m●[0m nginx.service - A high performance web server and a reverse proxy server
     Loaded: loaded (/lib/systemd/system/nginx.service; enabled; vendor preset: enabled)
     Active: [0;1;32mactive (running)[0m since Sat 2021-03-06 11:42:41 +07; 7min ago
       Docs: man:nginx(8)
    Process: 6483 ExecStartPre=/usr/sbin/nginx -t -q -g daemon on; master_process on; (code=exited, status=0/SUCCESS)
    Process: 6484 ExecStart=/usr/sbin/nginx -g daemon on; master_process on; (code=exited, status=0/SUCCESS)
    Process: 7098 ExecReload=/usr/sbin/nginx -g daemon on; master_process on; -s reload (code=exited, status=0/SUCCESS)
   Main PID: 6485 (nginx)
      Tasks: 5 (limit: 6988)
     Memory: 9.0M
     CGroup: /system.slice/nginx.service
             ├─6485 nginx: master process /usr/sbin/nginx -g daemon on; master_process on;
             ├─7099 nginx: worker process
             ├─7100 nginx: worker process
             ├─7101 nginx: worker process
             └─7102 nginx: worker process

Mar 06 11:42:41 qdoan21-Aspire-A315-42 systemd[1]: Starting A high performance web server and a reverse proxy server...
Mar 06 11:42:41 qdoan21-Aspire-A315-42 systemd[1]: Started A high performance web server and a reverse proxy server.
Mar 06 11:47:49 qdoan21-Aspire-A315-42 systemd[1]: Reloading A high performance web server and a reverse proxy server.
Mar 06 11:47:49 qdoan21-Aspire-A315-42 systemd[1]: Reloaded A high performance web server and a reverse proxy server.
