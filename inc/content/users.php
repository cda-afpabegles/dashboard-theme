<?php
add_role(
    'assistant_formation',
    __( 'Assistant(e) de formation' ),
    get_role( 'subscriber' )->capabilities
);
add_role(
    'Direction',
    __( 'Direction' ),
    get_role( 'subscriber' )->capabilities
);
add_role(
    'communication',
    __( 'Communication' ),
    get_role( 'subscriber' )->capabilities
);
?>