import multiprocessing

workers = multiprocessing.cpu_count() * 2 + 1
bind = 'unix:flask_rest.sock'
umask = 0o007
reload = True

#logging
accesslog = '-'
errorlog = '-'