package com.example.appcriatil.viewModel

import com.example.appcriatil.RoomDB.CriatilDataBase
import com.example.appcriatil.RoomDB.Usuario
import com.example.appcriatil.RoomDB.UsuarioDao

class Repository (private val db: CriatilDataBase) {

    suspend fun upsertUsuario(usuario: Usuario) {
        db.usuarioDao().upsertUsuario(usuario)
    }

    suspend fun deleteUsuario(usuario: Usuario) {
        db.usuarioDao().deleteUsuario(usuario)
    }

    fun getAllUsuario() = db.usuarioDao().getAllUsuario()

    suspend fun loginUsuario(email: String, senha: String): List<Usuario> {
        return db.usuarioDao().loginUsuario(email, senha)
    }

    suspend fun verificarEmail(email: String): List<Usuario>{
        return db.usuarioDao().verificarEmail(email)
    }

    suspend fun verificarLogin(): List<Usuario>{
        return db.usuarioDao().verificarLogin()
    }
    suspend fun getIdUsuario(idCliente: Int): List<Usuario>{
        return db.usuarioDao().getIdUsuario(idCliente)
    }

}