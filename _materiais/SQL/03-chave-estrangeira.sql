ALTER TABLE posts ADD 
    CONSTRAINT fk_posts_usuarios 
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id); 