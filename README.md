# Green Case

Agregar la carpeta csv al archivo /etc/apparmor.d/usr.sbin.mysqld

```
/usr/sbin/mysqld {
    [...]
    # Allow data files dir access
    /var/lib/mysql-files/ r,
    /var/lib/mysql-files/** rwk,

    /path/to/project/storage/csv/ r,
    /path/to/project/storage/csv/* rwk,
    [...]
}
```

y luego correr

```
sudo /etc/init.d/apparmor reload
```

La carpeta csv sirve como pivot porque luego se elimina el archivo del servidor
