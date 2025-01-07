import Pagination from '@mui/material/Pagination';
import Stack from '@mui/material/Stack';
import PropTypes from 'prop-types';

function PaginationComponent({
    totalPages,
    currentPage,
    onPageChange,
    variant = 'outlined',
    color,
    shape = 'rounded',
}) {
    return (
        <div className="d-flex justify-content-center">
            <Stack spacing={2}>
                <Pagination
                    count={totalPages}
                    page={currentPage}
                    onChange={(event, page) => onPageChange(page)}
                    variant={variant}
                    color={color}
                    shape={shape}
                    sx={{
                        '& .MuiPaginationItem-root': {
                            fontSize: '1.5rem',
                            padding: '20px',
                            minWidth: '48px',
                            minHeight: '48px',
                        },
                        '& .MuiPaginationItem-icon': {
                            fontSize: '2rem',
                        },
                    }}
                />
            </Stack>
        </div>
    );
}

PaginationComponent.propTypes = {
    totalPages: PropTypes.number.isRequired,
    currentPage: PropTypes.number.isRequired,
    onPageChange: PropTypes.func.isRequired,
    variant: PropTypes.string,
    color: PropTypes.string,
    shape: PropTypes.string,
};

export default PaginationComponent;
