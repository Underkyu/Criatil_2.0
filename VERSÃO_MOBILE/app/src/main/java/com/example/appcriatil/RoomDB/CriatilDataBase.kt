package com.example.appcriatil.RoomDB

import androidx.room.Database
import androidx.room.RoomDatabase

@Database(
    entities = [
        Usuario::class
    ],
    version = 1,
)

abstract class CriatilDataBase: RoomDatabase() {
    abstract fun usuarioDao(): UsuarioDao
}